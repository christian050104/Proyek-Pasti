package controller

import (
	"net/http"

	"github.com/gin-gonic/gin"
	"github.com/christian050104/service_order/dto"
	"github.com/christian050104/service_order/helper"
	"github.com/christian050104/service_order/service"
)

// OrderController is a contract about something that this controller can do
type OrderItemController interface {
	Insert(ctx *gin.Context)
}

type orderItemController struct {
	OrderItemService service.OrderItemService
}

// NewOrderController creates a new instance of AuthController
func NewOrderItemController(OrderItemService service.OrderItemService) OrderItemController {
	return &orderItemController{
		OrderItemService: OrderItemService,
	}
}

func (c *orderItemController) Insert(ctx *gin.Context) {
	var orderItemCreateDTO dto.OrderItemCreateDTO
	errDTO := ctx.ShouldBind(&orderItemCreateDTO)
	if errDTO != nil {
		res := helper.BuildErrorResponse("Failed to process request", errDTO.Error(), helper.EmptyObj{})
		ctx.AbortWithStatusJSON(http.StatusBadRequest, res)
		return
	}

	orderItem := c.OrderItemService.Insert(orderItemCreateDTO)
	response := helper.BuildResponse(true, "OK!", orderItem)
	ctx.JSON(http.StatusCreated, response)
}
