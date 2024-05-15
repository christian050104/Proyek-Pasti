package repository

import (
    "github.com/christian050104/service_feedback/entity"
    "gorm.io/gorm"
)

type FeedbackRepository interface {
    InsertFeedback(feedback entity.Feedback) entity.Feedback
    UpdateFeedback(feedback entity.Feedback) entity.Feedback
    GetAllFeedbacks() []entity.Feedback
    GetFeedbackByID(id uint) entity.Feedback
    DeleteFeedback(feedback entity.Feedback)
}

type feedbackRepository struct {
    db *gorm.DB
}

func NewFeedbackRepository(db *gorm.DB) FeedbackRepository {
    return &feedbackRepository{
        db: db,
    }
}

func (repo *feedbackRepository) InsertFeedback(feedback entity.Feedback) entity.Feedback {
    repo.db.Create(&feedback)
    return feedback
}

func (repo *feedbackRepository) UpdateFeedback(feedback entity.Feedback) entity.Feedback {
    repo.db.Save(&feedback)
    return feedback
}

func (repo *feedbackRepository) GetAllFeedbacks() []entity.Feedback {
    var feedbacks []entity.Feedback
    repo.db.Find(&feedbacks)
    return feedbacks
}

func (repo *feedbackRepository) GetFeedbackByID(id uint) entity.Feedback {
    var feedback entity.Feedback
    repo.db.First(&feedback, id)
    return feedback
}

func (repo *feedbackRepository) DeleteFeedback(feedback entity.Feedback) {
    repo.db.Delete(&feedback)
}
