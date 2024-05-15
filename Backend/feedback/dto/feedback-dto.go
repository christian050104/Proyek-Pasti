package dto

type FeedbackDTO struct {
    UserID    uint   `json:"user_id" binding:"required"`
    Feedback  string `json:"feedback" binding:"required"`
    Rating    int    `json:"rating" binding:"required"`
}

type FeedbackUpdateDTO struct {
    ID        uint   `json:"id" binding:"required"`
    UserID    uint   `json:"user_id" binding:"required"`
    Feedback  string `json:"feedback" binding:"required"`
    Rating    int    `json:"rating" binding:"required"`
}
