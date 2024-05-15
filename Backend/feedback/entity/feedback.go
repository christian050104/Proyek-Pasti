package entity

import "gorm.io/gorm"

type Feedback struct {
	gorm.Model
	UserID   uint   `json:"user_id"`
	Feedback string `json:"feedback"`
	Rating   int    `json:"rating"`
}
