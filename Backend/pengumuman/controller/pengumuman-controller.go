package controller

import (
    "net/http"
    "strconv"

    "github.com/gin-gonic/gin"
    "github.com/christian050104/service_pengumuman/dto"
    "github.com/christian050104/service_pengumuman/helper"
    "github.com/christian050104/service_pengumuman/service"
)

type AnnouncementController interface {
    CreateAnnouncement(ctx *gin.Context)
    UpdateAnnouncement(ctx *gin.Context)
    GetAllAnnouncements(ctx *gin.Context)
    GetAnnouncementByID(ctx *gin.Context)
    DeleteAnnouncement(ctx *gin.Context)
}

type announcementController struct {
    announcementService service.AnnouncementService
}

func NewAnnouncementController(announcementService service.AnnouncementService) AnnouncementController {
    return &announcementController{
        announcementService: announcementService,
    }
}

func (c *announcementController) CreateAnnouncement(ctx *gin.Context) {
    var announcementDTO dto.AnnouncementDTO
    errDTO := ctx.ShouldBind(&announcementDTO)
    if errDTO != nil {
        res := helper.BuildErrorResponse("Failed to process request", errDTO.Error(), helper.EmptyObj{})
        ctx.JSON(http.StatusBadRequest, res)
        return
    }
    announcement := c.announcementService.CreateAnnouncement(announcementDTO)
    res := helper.BuildResponse(true, "Announcement created successfully", announcement)
    ctx.JSON(http.StatusCreated, res)
}

func (c *announcementController) UpdateAnnouncement(ctx *gin.Context) {
    var announcementUpdateDTO dto.AnnouncementUpdateDTO
    errDTO := ctx.ShouldBind(&announcementUpdateDTO)
    if errDTO != nil {
        res := helper.BuildErrorResponse("Failed to process request", errDTO.Error(), helper.EmptyObj{})
        ctx.JSON(http.StatusBadRequest, res)
        return
    }
    id := c.getIDParam(ctx)
    if id == 0 {
        res := helper.BuildErrorResponse("Failed to process request", "Invalid ID", helper.EmptyObj{})
        ctx.JSON(http.StatusBadRequest, res)
        return
    }
    announcementUpdateDTO.ID = id
    announcement := c.announcementService.UpdateAnnouncement(id, announcementUpdateDTO)
    res := helper.BuildResponse(true, "Announcement updated successfully", announcement)
    ctx.JSON(http.StatusOK, res)
}

func (c *announcementController) GetAllAnnouncements(ctx *gin.Context) {
    announcements := c.announcementService.GetAllAnnouncements()
    res := helper.BuildResponse(true, "OK", announcements)
    ctx.JSON(http.StatusOK, res)
}

func (c *announcementController) GetAnnouncementByID(ctx *gin.Context) {
    id := c.getIDParam(ctx)
    if id == 0 {
        res := helper.BuildErrorResponse("Failed to get ID", "No param ID were found", helper.EmptyObj{})
        ctx.JSON(http.StatusBadRequest, res)
        return
    }
    announcement := c.announcementService.GetAnnouncementByID(id)
    res := helper.BuildResponse(true, "OK", announcement)
    ctx.JSON(http.StatusOK, res)
}

func (c *announcementController) DeleteAnnouncement(ctx *gin.Context) {
    id := c.getIDParam(ctx)
    if id == 0 {
        res := helper.BuildErrorResponse("Failed to get ID", "No param ID were found", helper.EmptyObj{})
        ctx.JSON(http.StatusBadRequest, res)
        return
    }
    c.announcementService.DeleteAnnouncement(id)
    res := helper.BuildResponse(true, "Announcement deleted successfully", helper.EmptyObj{})
    ctx.JSON(http.StatusOK, res)
}

func (c *announcementController) getIDParam(ctx *gin.Context) uint {
    idStr := ctx.Param("id")
    id, err := strconv.ParseUint(idStr, 10, 64)
    if err != nil {
        return 0
    }
    return uint(id)
}
