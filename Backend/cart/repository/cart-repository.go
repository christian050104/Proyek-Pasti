package repository

import (
    "github.com/christian050104/service_cart/entity"
    "gorm.io/gorm"
)

type CartRepository interface {
    InsertCart(cart entity.Cart) entity.Cart
    UpdateCart(cart entity.Cart) entity.Cart
    All(userID uint64) []entity.Cart
    GetByID(id uint) entity.Cart
    DeleteCart(cart entity.Cart)
}

type cartConnection struct {
    connection *gorm.DB
}

func NewCartRepository(db *gorm.DB) CartRepository {
    return &cartConnection{
        connection: db,
    }
}

func (db *cartConnection) InsertCart(cart entity.Cart) entity.Cart {
    db.connection.Save(&cart)
    return cart
}

func (db *cartConnection) UpdateCart(cart entity.Cart) entity.Cart {
    db.connection.Save(&cart)
    return cart
}

func (db *cartConnection) All(userID uint64) []entity.Cart {
    var carts []entity.Cart
    db.connection.Find(&carts, "user_id = ?", userID)
    return carts
}

func (db *cartConnection) GetByID(id uint) entity.Cart {
    var cart entity.Cart
    db.connection.First(&cart, id)
    return cart
}

func (db *cartConnection) DeleteCart(cart entity.Cart) {
    db.connection.Delete(&cart)
}
