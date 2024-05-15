package repository

import (
    "github.com/christian050104/service_pengumuman/entity"
    "gorm.io/gorm"
)

type AnnouncementRepository interface {
    InsertAnnouncement(announcement entity.Announcement) entity.Announcement
    UpdateAnnouncement(announcement entity.Announcement) entity.Announcement
    GetAllAnnouncements() []entity.Announcement
    GetAnnouncementByID(id uint) entity.Announcement
    DeleteAnnouncement(announcement entity.Announcement)
}

type announcementRepository struct {
    db *gorm.DB
}

func NewAnnouncementRepository(db *gorm.DB) AnnouncementRepository {
    return &announcementRepository{
        db: db,
    }
}

func (repo *announcementRepository) InsertAnnouncement(announcement entity.Announcement) entity.Announcement {
    repo.db.Create(&announcement)
    return announcement
}

func (repo *announcementRepository) UpdateAnnouncement(announcement entity.Announcement) entity.Announcement {
    repo.db.Save(&announcement)
    return announcement
}

func (repo *announcementRepository) GetAllAnnouncements() []entity.Announcement {
    var announcements []entity.Announcement
    repo.db.Find(&announcements)
    return announcements
}

func (repo *announcementRepository) GetAnnouncementByID(id uint) entity.Announcement {
    var announcement entity.Announcement
    repo.db.First(&announcement, id)
    return announcement
}

func (repo *announcementRepository) DeleteAnnouncement(announcement entity.Announcement) {
    repo.db.Delete(&announcement)
}
