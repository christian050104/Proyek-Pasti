package main

import (
    "github.com/gin-gonic/gin"
    "github.com/christian050104/service_pengumuman/config"
    "github.com/christian050104/service_pengumuman/controller"
    "github.com/christian050104/service_pengumuman/entity"
    "github.com/christian050104/service_pengumuman/repository"
    "github.com/christian050104/service_pengumuman/service"
    "gorm.io/gorm"
)

var (
    db                     *gorm.DB                           = config.SetupDatabaseConnection()
    announcementRepository repository.AnnouncementRepository = repository.NewAnnouncementRepository(db)
    announcementService    service.AnnouncementService       = service.NewAnnouncementService(announcementRepository)
    announcementController controller.AnnouncementController = controller.NewAnnouncementController(announcementService)
)

func main() {
    defer config.CloseDatabaseConnection(db)

    db.AutoMigrate(&entity.Announcement{})

    r := gin.Default()

    announcementRoutes := r.Group("/api/announcements")
    {
        announcementRoutes.POST("/", announcementController.CreateAnnouncement)
        announcementRoutes.PUT("/:id", announcementController.UpdateAnnouncement)
        announcementRoutes.GET("/", announcementController.GetAllAnnouncements)
        announcementRoutes.GET("/:id", announcementController.GetAnnouncementByID)
        announcementRoutes.DELETE("/:id", announcementController.DeleteAnnouncement)
    }

    r.Run(":8086")
}
