package dto

type CartUpdateDTO struct {
	ID           uint `json:"id" form:"id" binding:"required"`
	ProductID    uint `json:"product_id" form:"product_id" binding:"required"`
	ProductImage string `json:"product_image" form:"product_image" binding:"required"`
	ProductName  string `json:"product_name" form:"product_name" binding:"required"`
	Quantity     int `json:"quantity" form:"quantity" binding:"required"`
	Price        int `json:"price" form:"price" binding:"required"`
	Total        int `json:"total" form:"total" binding:"required"`
	UserID       uint `json:"user_id" form:"user_id" binding:"required"`
}

type CartCreateDTO struct {
	ProductID    uint `json:"product_id" form:"product_id" binding:"required"`
	ProductImage string `json:"product_image" form:"product_image" binding:"required"`
	ProductName  string `json:"product_name" form:"product_name" binding:"required"`
	Quantity     int `json:"quantity" form:"quantity" binding:"required"`
	Price        int `json:"price" form:"price" binding:"required"`
	Total        int `json:"total" form:"total" binding:"required"`
	UserID       uint `json:"user_id" form:"user_id" binding:"required"`
}
