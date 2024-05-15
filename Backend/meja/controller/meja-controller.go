package controller

import (
    "net/http"
    "strconv"

    "github.com/gin-gonic/gin"
    "github.com/christian050104/service_meja/dto"
    "github.com/christian050104/service_meja/entity"
    "github.com/christian050104/service_meja/helper"
    "github.com/christian050104/service_meja/service"
)

type MejaController interface {
    All(ctx *gin.Context)
    FindByID(ctx *gin.Context)
    Insert(ctx *gin.Context)
    Update(ctx *gin.Context)
    Delete(ctx *gin.Context)
}

type mejaController struct {
    MejaService service.MejaService
}

func NewMejaController(MejaService service.MejaService) MejaController {
    return &mejaController{
        MejaService: MejaService,
    }
}

func (c *mejaController) All(ctx *gin.Context) {
    mejas := c.MejaService.All()
    ctx.JSON(http.StatusOK, mejas)
}

func (c *mejaController) FindByID(ctx *gin.Context) {
    idStr := ctx.Param("id")
    id, err := strconv.ParseUint(idStr, 10, 64)
    if err != nil {
        res := helper.BuildErrorResponse("Failed to get ID", "No param ID were found", helper.EmptyObj{})
        ctx.JSON(http.StatusBadRequest, res)
        return
    }

    meja := c.MejaService.FindByID(id)
    if meja.ID == 0 {
        res := helper.BuildErrorResponse("Data not found", "No data with given ID", helper.EmptyObj{})
        ctx.JSON(http.StatusNotFound, res)
        return
    }

    ctx.JSON(http.StatusOK, meja)
}

func (c *mejaController) Insert(ctx *gin.Context) {
    var mejaCreateDTO dto.MejaCreateDTO
    errDTO := ctx.ShouldBind(&mejaCreateDTO)
    if errDTO != nil {
        res := helper.BuildErrorResponse("Failed to process request", errDTO.Error(), helper.EmptyObj{})
        ctx.JSON(http.StatusBadRequest, res)
        return
    }
    result := c.MejaService.Insert(mejaCreateDTO)
    response := helper.BuildResponse(true, "OK!", result)
    ctx.JSON(http.StatusCreated, response)
}

func (c *mejaController) Update(ctx *gin.Context) {
    var mejaUpdateDTO dto.MejaUpdateDTO
    errDTO := ctx.ShouldBind(&mejaUpdateDTO)
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
    mejaUpdateDTO.ID = uint(id)
    result := c.MejaService.Update(mejaUpdateDTO)
    response := helper.BuildResponse(true, "OK!", result)
    ctx.JSON(http.StatusOK, response)
}

func (c *mejaController) Delete(ctx *gin.Context) {
    var meja entity.Meja
    idStr := ctx.Param("id")
    id, err := strconv.ParseUint(idStr, 10, 64)
    if err != nil {
        res := helper.BuildErrorResponse("Failed to get ID", "No param ID were found", helper.EmptyObj{})
        ctx.JSON(http.StatusBadRequest, res)
        return
    }
    meja.ID = uint(id)
    c.MejaService.Delete(meja)
    res := helper.BuildResponse(true, "Deleted", helper.EmptyObj{})
    ctx.JSON(http.StatusOK, res)
}
