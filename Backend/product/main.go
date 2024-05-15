package main

import (
	"github.com/gin-gonic/gin"
	"github.com/christian050104/service_product/config"
	"github.com/christian050104/service_product/controller"
	"github.com/christian050104/service_product/repository"
	"github.com/christian050104/service_product/service"
	"gorm.io/gorm"
)

var (
	db                *gorm.DB                     = config.SetupDatabaseConnection()
	productRepository repository.ProductRepository = repository.NewProductRepository(db)
	ProductService    service.ProductService       = service.NewProductService(productRepository)
	productController controller.ProductController = controller.NewProductController(ProductService)
)

// membuat variable db dengan nilai setup database connection
func main() {
	defer config.CloseDatabaseConnection(db)
	r := gin.Default()

	productRoutes := r.Group("/api/products")
	{
		productRoutes.GET("/", productController.All)
		productRoutes.POST("/", productController.Insert)
		productRoutes.GET("/:id", productController.FindByID)
		productRoutes.PUT("/:id", productController.Update)
		productRoutes.DELETE("/:id", productController.Delete)
		productRoutes.GET("/:id/related", productController.RelatedProducts)


	}
	r.Run(":8999")
}
