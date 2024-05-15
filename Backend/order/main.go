package main

import (
	"github.com/gin-gonic/gin"
	"github.com/christian050104/service_order/config"
	"github.com/christian050104/service_order/controller"
	"github.com/christian050104/service_order/repository"
	"github.com/christian050104/service_order/service"
	"gorm.io/gorm"
)

var (
	db                  *gorm.DB                       = config.SetupDatabaseConnection()
	orderRepository     repository.OrderRepository     = repository.NewOrderRepository(db)
	OrderService        service.OrderService           = service.NewOrderService(orderRepository)
	orderController     controller.OrderController     = controller.NewOrderController(OrderService)
	orderItemRepository repository.OrderItemRepository = repository.NewOrderItemRepository(db)
	orderItemService    service.OrderItemService       = service.NewOrderItemService(orderItemRepository)
	orderItemController controller.OrderItemController = controller.NewOrderItemController(orderItemService)
)

// membuat variable db dengan nilai setup database connection
func main() {
	defer config.CloseDatabaseConnection(db)
	r := gin.Default()

	orderRoutes := r.Group("/api/orders")
	{
		orderRoutes.GET("/", orderController.All)
		orderRoutes.POST("/", orderController.Insert)
		orderRoutes.PUT("/:id", orderController.Update)
		orderRoutes.GET("/:id", orderController.FindByID)
		orderRoutes.DELETE("/:id", orderController.Delete)
	}

	orderItemRoutes := r.Group("/api/order-items")
	{
		orderItemRoutes.POST("/", orderItemController.Insert)
	}
	r.Run(":8083")
}
