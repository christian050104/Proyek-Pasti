package dto

type AnnouncementDTO struct {
    Title    string `json:"title" binding:"required"`
    Content  string `json:"content" binding:"required"`
    ImageURL string `json:"image_url" binding:"required"`
}

type AnnouncementUpdateDTO struct {
    ID       uint   `json:"id" binding:"required"`
    Title    string `json:"title" binding:"required"`
    Content  string `json:"content" binding:"required"`
    ImageURL string `json:"image_url" binding:"required"`
}
