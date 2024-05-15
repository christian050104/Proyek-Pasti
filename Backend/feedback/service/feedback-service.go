package service

import (
    "log"
    "github.com/christian050104/service_feedback/dto"
    "github.com/christian050104/service_feedback/entity"
    "github.com/christian050104/service_feedback/repository"
    "github.com/mashingan/smapping"
)

type FeedbackService interface {
    CreateFeedback(dto dto.FeedbackDTO) entity.Feedback
    UpdateFeedback(dto dto.FeedbackUpdateDTO) entity.Feedback
    GetAllFeedbacks() []entity.Feedback
    GetFeedbackByID(id uint) entity.Feedback
    DeleteFeedback(id uint)
}

type feedbackService struct {
    feedbackRepository repository.FeedbackRepository
}

func NewFeedbackService(feedbackRepository repository.FeedbackRepository) FeedbackService {
    return &feedbackService{
        feedbackRepository: feedbackRepository,
    }
}

func (service *feedbackService) CreateFeedback(dto dto.FeedbackDTO) entity.Feedback {
    feedback := entity.Feedback{}
    err := smapping.FillStruct(&feedback, smapping.MapFields(&dto))
    if err != nil {
        log.Fatalf("Failed to map %v", err)
    }
    return service.feedbackRepository.InsertFeedback(feedback)
}

func (service *feedbackService) UpdateFeedback(dto dto.FeedbackUpdateDTO) entity.Feedback {
    feedback := service.feedbackRepository.GetFeedbackByID(dto.ID)
    err := smapping.FillStruct(&feedback, smapping.MapFields(&dto))
    if err != nil {
        log.Fatalf("Failed to map %v", err)
    }
    return service.feedbackRepository.UpdateFeedback(feedback)
}

func (service *feedbackService) GetAllFeedbacks() []entity.Feedback {
    return service.feedbackRepository.GetAllFeedbacks()
}

func (service *feedbackService) GetFeedbackByID(id uint) entity.Feedback {
    return service.feedbackRepository.GetFeedbackByID(id)
}

func (service *feedbackService) DeleteFeedback(id uint) {
    feedback := service.feedbackRepository.GetFeedbackByID(id)
    service.feedbackRepository.DeleteFeedback(feedback)
}
