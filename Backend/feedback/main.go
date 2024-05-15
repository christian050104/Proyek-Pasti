package main

import (
    "github.com/gin-gonic/gin"
    "github.com/christian050104/service_feedback/config"
    "github.com/christian050104/service_feedback/controller"
    "github.com/christian050104/service_feedback/entity"
    "github.com/christian050104/service_feedback/repository"
    "github.com/christian050104/service_feedback/service"
    "gorm.io/gorm"
)

var (
    db                  *gorm.DB                      = config.SetupDatabaseConnection()
    feedbackRepository  repository.FeedbackRepository = repository.NewFeedbackRepository(db)
    feedbackService     service.FeedbackService       = service.NewFeedbackService(feedbackRepository)
    feedbackController  controller.FeedbackController = controller.NewFeedbackController(feedbackService)
)

func main() {
    defer config.CloseDatabaseConnection(db)

    // Auto-migrate the Feedback entity to create the feedbacks table
    db.AutoMigrate(&entity.Feedback{})

    r := gin.Default()

    feedbackRoutes := r.Group("/api/feedbacks")
    {
        feedbackRoutes.POST("/", feedbackController.CreateFeedback)
        feedbackRoutes.PUT("/:id", feedbackController.UpdateFeedback)
        feedbackRoutes.GET("/", feedbackController.GetAllFeedbacks)
        feedbackRoutes.GET("/:id", feedbackController.GetFeedbackByID)
        feedbackRoutes.DELETE("/:id", feedbackController.DeleteFeedback)
    }

    r.Run(":8081")
}
