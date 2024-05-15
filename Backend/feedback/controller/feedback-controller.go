package controller

import (
    "net/http"
    "strconv"

    "github.com/gin-gonic/gin"
    "github.com/christian050104/service_feedback/dto"
    "github.com/christian050104/service_feedback/helper"
    "github.com/christian050104/service_feedback/service"
)

type FeedbackController interface {
    CreateFeedback(ctx *gin.Context)
    UpdateFeedback(ctx *gin.Context)
    GetAllFeedbacks(ctx *gin.Context)
    GetFeedbackByID(ctx *gin.Context)
    DeleteFeedback(ctx *gin.Context)
}

type feedbackController struct {
    feedbackService service.FeedbackService
}

func NewFeedbackController(feedbackService service.FeedbackService) FeedbackController {
    return &feedbackController{
        feedbackService: feedbackService,
    }
}

func (c *feedbackController) CreateFeedback(ctx *gin.Context) {
    var feedbackDTO dto.FeedbackDTO
    errDTO := ctx.ShouldBind(&feedbackDTO)
    if errDTO != nil {
        res := helper.BuildErrorResponse("Failed to process request", errDTO.Error(), helper.EmptyObj{})
        ctx.JSON(http.StatusBadRequest, res)
        return
    }
    feedback := c.feedbackService.CreateFeedback(feedbackDTO)
    res := helper.BuildResponse(true, "Feedback created successfully", feedback)
    ctx.JSON(http.StatusCreated, res)
}

func (c *feedbackController) UpdateFeedback(ctx *gin.Context) {
    var feedbackUpdateDTO dto.FeedbackUpdateDTO
    errDTO := ctx.ShouldBind(&feedbackUpdateDTO)
    if errDTO != nil {
        res := helper.BuildErrorResponse("Failed to process request", errDTO.Error(), helper.EmptyObj{})
        ctx.JSON(http.StatusBadRequest, res)
        return
    }
    feedbackUpdateDTO.ID = c.getIDParam(ctx)
    if feedbackUpdateDTO.ID == 0 {
        res := helper.BuildErrorResponse("Failed to process request", "Invalid ID", helper.EmptyObj{})
        ctx.JSON(http.StatusBadRequest, res)
        return
    }
    feedback := c.feedbackService.UpdateFeedback(feedbackUpdateDTO)
    res := helper.BuildResponse(true, "Feedback updated successfully", feedback)
    ctx.JSON(http.StatusOK, res)
}

func (c *feedbackController) GetAllFeedbacks(ctx *gin.Context) {
    feedbacks := c.feedbackService.GetAllFeedbacks()
    res := helper.BuildResponse(true, "OK", feedbacks)
    ctx.JSON(http.StatusOK, res)
}

func (c *feedbackController) GetFeedbackByID(ctx *gin.Context) {
    id := c.getIDParam(ctx)
    if id == 0 {
        res := helper.BuildErrorResponse("Failed to get ID", "No param ID were found", helper.EmptyObj{})
        ctx.JSON(http.StatusBadRequest, res)
        return
    }
    feedback := c.feedbackService.GetFeedbackByID(id)
    res := helper.BuildResponse(true, "OK", feedback)
    ctx.JSON(http.StatusOK, res)
}

func (c *feedbackController) DeleteFeedback(ctx *gin.Context) {
    id := c.getIDParam(ctx)
    if id == 0 {
        res := helper.BuildErrorResponse("Failed to get ID", "No param ID were found", helper.EmptyObj{})
        ctx.JSON(http.StatusBadRequest, res)
        return
    }
    c.feedbackService.DeleteFeedback(id)
    res := helper.BuildResponse(true, "Feedback deleted successfully", helper.EmptyObj{})
    ctx.JSON(http.StatusOK, res)
}

func (c *feedbackController) getIDParam(ctx *gin.Context) uint {
    idStr := ctx.Param("id")
    id, err := strconv.ParseUint(idStr, 10, 64)
    if err != nil {
        return 0
    }
    return uint(id)
}
