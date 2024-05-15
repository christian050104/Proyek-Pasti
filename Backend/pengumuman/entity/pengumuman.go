package entity

import "gorm.io/gorm"

type Announcement struct {
    gorm.Model
    Title    string `json:"title"`
    Content  string `json:"content"`
    ImageURL string `json:"image_url"`
}
