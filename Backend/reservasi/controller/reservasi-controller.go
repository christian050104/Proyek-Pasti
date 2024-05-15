// controller/reservasi_controller.go
package controller

import (
	"net/http"
	"strconv"

	"github.com/gin-gonic/gin"
	"github.com/christian050104/service_reservasi/dto"
	"github.com/christian050104/service_reservasi/entity"
	"github.com/christian050104/service_reservasi/helper"
	"github.com/christian050104/service_reservasi/service"
)

type ReservasiController interface {
	All(ctx *gin.Context)
	FindByID(ctx *gin.Context)
	Insert(ctx *gin.Context)
	Update(ctx *gin.Context)
	Delete(ctx *gin.Context)
}

type reservasiController struct {
	ReservasiService service.ReservasiService
}

func NewReservasiController(ReservasiService service.ReservasiService) ReservasiController {
	return &reservasiController{
		ReservasiService: ReservasiService,
	}
}

func (c *reservasiController) All(ctx *gin.Context) {
	reservasis := c.ReservasiService.All()
	ctx.JSON(http.StatusOK, reservasis)
}

func (c *reservasiController) FindByID(ctx *gin.Context) {
	idStr := ctx.Param("id")
	id, err := strconv.ParseUint(idStr, 10, 64)
	if err != nil {
		res := helper.BuildErrorResponse("Failed to get ID", "No param ID were found", helper.EmptyObj{})
		ctx.JSON(http.StatusBadRequest, res)
		return
	}

	reservasi := c.ReservasiService.FindByID(id)
	if reservasi.ID == 0 {
		res := helper.BuildErrorResponse("Data not found", "No data with given ID", helper.EmptyObj{})
		ctx.JSON(http.StatusNotFound, res)
		return
	}

	ctx.JSON(http.StatusOK, reservasi)
}

func (c *reservasiController) Insert(ctx *gin.Context) {
	var reservasiCreateDTO dto.ReservasiCreateDTO
	errDTO := ctx.ShouldBind(&reservasiCreateDTO)
	if errDTO != nil {
		res := helper.BuildErrorResponse("Failed to process request", errDTO.Error(), helper.EmptyObj{})
		ctx.JSON(http.StatusBadRequest, res)
		return
	}
	result := c.ReservasiService.Insert(reservasiCreateDTO)
	response := helper.BuildResponse(true, "OK!", result)
	ctx.JSON(http.StatusCreated, response)
}

func (c *reservasiController) Update(ctx *gin.Context) {
	var reservasiUpdateDTO dto.ReservasiUpdateDTO
	errDTO := ctx.ShouldBind(&reservasiUpdateDTO)
	if errDTO != nil {
		res := helper.BuildErrorResponse("Failed to process request", errDTO.Error(), helper.EmptyObj{})
		ctx.JSON(http.StatusBadRequest, res)
		return
	}
	idStr := ctx.Param("id")
	id, errID := strconv.ParseUint(idStr, 10, 64)
	if errID != nil {
		res := helper.BuildErrorResponse("Failed to get ID", "No param ID were found", helper.EmptyObj{})
		ctx.JSON(http.StatusBadRequest, res)
		return
	}
	reservasiUpdateDTO.ID = uint(id)
	result := c.ReservasiService.Update(reservasiUpdateDTO)
	response := helper.BuildResponse(true, "OK!", result)
	ctx.JSON(http.StatusOK, response)
}

func (c *reservasiController) Delete(ctx *gin.Context) {
	var reservasi entity.Reservasi
	idStr := ctx.Param("id")
	id, err := strconv.ParseUint(idStr, 10, 64)
	if err != nil {
		res := helper.BuildErrorResponse("Failed to get ID", "No param ID were found", helper.EmptyObj{})
		ctx.JSON(http.StatusBadRequest, res)
		return
	}
	reservasi.ID = uint(id)
	c.ReservasiService.Delete(reservasi)
	res := helper.BuildResponse(true, "Deleted", helper.EmptyObj{})
	ctx.JSON(http.StatusOK, res)
}
