package main

import (
    "github.com/gin-gonic/gin"
    "github.com/christian050104/service_meja/config"
    "github.com/christian050104/service_meja/controller"
    "github.com/christian050104/service_meja/entity"
    "github.com/christian050104/service_meja/repository"
    "github.com/christian050104/service_meja/service"
    "gorm.io/gorm"
)

var (
    db            *gorm.DB                         = config.SetupDatabaseConnection()
    mejaRepository repository.MejaRepository       = repository.NewMejaRepository(db)
    MejaService    service.MejaService             = service.NewMejaService(mejaRepository)
    mejaController controller.MejaController       = controller.NewMejaController(MejaService)
)

func main() {
    defer config.CloseDatabaseConnection(db)
    r := gin.Default()

    db.AutoMigrate(&entity.Meja{})

    mejaRoutes := r.Group("/api/mejas")
    {
        mejaRoutes.GET("/", mejaController.All)
        mejaRoutes.POST("/", mejaController.Insert)
        mejaRoutes.GET("/:id", mejaController.FindByID)
        mejaRoutes.PUT("/:id", mejaController.Update)
        mejaRoutes.DELETE("/:id", mejaController.Delete)
    }

    r.Run(":8992")
}

