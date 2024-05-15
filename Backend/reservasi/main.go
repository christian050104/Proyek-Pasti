package main

import (
	"github.com/gin-gonic/gin"
	"github.com/christian050104/service_reservasi/config"
	"github.com/christian050104/service_reservasi/controller"
	"github.com/christian050104/service_reservasi/entity"
	"github.com/christian050104/service_reservasi/repository"
	"github.com/christian050104/service_reservasi/service"
	"gorm.io/gorm"
)

var (
	db                  *gorm.DB                             = config.SetupDatabaseConnection()
	reservasiRepository repository.ReservasiRepository       = repository.NewReservasiRepository(db)
	ReservasiService    service.ReservasiService             = service.NewReservasiService(reservasiRepository)
	reservasiController controller.ReservasiController       = controller.NewReservasiController(ReservasiService)
)

func main() {
	defer config.CloseDatabaseConnection(db)
	r := gin.Default()

    db.AutoMigrate(&entity.Reservasi{})


	reservasiRoutes := r.Group("/api/reservasis")
	{
		reservasiRoutes.GET("/", reservasiController.All)
		reservasiRoutes.POST("/", reservasiController.Insert)
		reservasiRoutes.GET("/:id", reservasiController.FindByID)
		reservasiRoutes.PUT("/:id", reservasiController.Update)
		reservasiRoutes.DELETE("/:id", reservasiController.Delete)
	}

	r.Run(":8997")
}
