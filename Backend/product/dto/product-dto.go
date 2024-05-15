package dto

type ProductCreateDTO struct {
 
    Name        string  `json:"name" form:"name" binding:"required,min=3,max=255"`
    Description string  `json:"description" form:"description" binding:"required,min=3"`
    Price       float64 `json:"price" form:"price" binding:"required"`
    Stock    int     `json:"stock" form:"stock" binding:"required"`
    Image       string  `json:"image" form:"image" binding:"required"`
    CategoryID  uint    `json:"category_id" form:"category_id" binding:"required"`
}

type ProductUpdateDTO struct {
    ID          uint   `json:"id" form:"id" binding:"required"`
    Name        string `json:"name" form:"name" binding:"required,min=3,max=255"`
    Description string `json:"description" form:"description" binding:"required,min=3"`
    Stock       int    `json:"stock" form:"stock" binding:"required"`   
    Price       float64 `json:"price" form:"price" binding:"required"`
    Image       string  `json:"image" form:"image" binding:"required"`
    CategoryID  uint    `json:"category_id" form:"category_id" binding:"required"`
}
