package main

import (
	"github.com/gin-gonic/gin"
	"github.com/christian050104/service_cart/config"
	"github.com/christian050104/service_cart/controller"
	"github.com/christian050104/service_cart/repository"
	"github.com/christian050104/service_cart/service"
	"gorm.io/gorm"
)

var (
	db             *gorm.DB                  = config.SetupDatabaseConnection()
	cartRepository repository.CartRepository = repository.NewCartRepository(db)
	CartService    service.CartService       = service.NewCartService(cartRepository)
	cartController controller.CartController = controller.NewCartController(CartService)
)

// membuat variable db dengan nilai setup database connection
func main() {
	defer config.CloseDatabaseConnection(db)
	r := gin.Default()

	cartRoutes := r.Group("/api/carts")
	{
		cartRoutes.GET("/", cartController.All)
		cartRoutes.POST("/", cartController.Insert)
		cartRoutes.PUT("/:id", cartController.Update)
		cartRoutes.DELETE("/:id", cartController.Delete)
	}
	r.Run(":8082")
}
