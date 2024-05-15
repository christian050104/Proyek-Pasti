package service

import (
    "github.com/christian050104/service_pengumuman/dto"
    "github.com/christian050104/service_pengumuman/entity"
    "github.com/christian050104/service_pengumuman/repository"
    "github.com/mashingan/smapping"
)

type AnnouncementService interface {
    CreateAnnouncement(dto dto.AnnouncementDTO) entity.Announcement
    UpdateAnnouncement(id uint, dto dto.AnnouncementUpdateDTO) entity.Announcement
    GetAllAnnouncements() []entity.Announcement
    GetAnnouncementByID(id uint) entity.Announcement
    DeleteAnnouncement(id uint)
}

type announcementService struct {
    announcementRepository repository.AnnouncementRepository
}

func NewAnnouncementService(announcementRepository repository.AnnouncementRepository) AnnouncementService {
    return &announcementService{
        announcementRepository: announcementRepository,
    }
}

func (service *announcementService) CreateAnnouncement(dto dto.AnnouncementDTO) entity.Announcement {
    announcement := entity.Announcement{}
    err := smapping.FillStruct(&announcement, smapping.MapFields(&dto))
    if err != nil {
        panic("Failed to map DTO to entity")
    }
    return service.announcementRepository.InsertAnnouncement(announcement)
}

func (service *announcementService) UpdateAnnouncement(id uint, dto dto.AnnouncementUpdateDTO) entity.Announcement {
    announcement := service.announcementRepository.GetAnnouncementByID(id)
    if announcement.ID == 0 {
        panic("Announcement not found")
    }
    err := smapping.FillStruct(&announcement, smapping.MapFields(&dto))
    if err != nil {
        panic("Failed to map DTO to entity")
    }
    return service.announcementRepository.UpdateAnnouncement(announcement)
}

func (service *announcementService) GetAllAnnouncements() []entity.Announcement {
    return service.announcementRepository.GetAllAnnouncements()
}

func (service *announcementService) GetAnnouncementByID(id uint) entity.Announcement {
    return service.announcementRepository.GetAnnouncementByID(id)
}

func (service *announcementService) DeleteAnnouncement(id uint) {
    announcement := service.announcementRepository.GetAnnouncementByID(id)
    if announcement.ID == 0 {
        panic("Announcement not found")
    }
    service.announcementRepository.DeleteAnnouncement(announcement)
}
