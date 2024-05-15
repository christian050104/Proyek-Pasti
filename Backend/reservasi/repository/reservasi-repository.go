package repository

import (
    "github.com/christian050104/service_reservasi/entity"
    "gorm.io/gorm"
)

type ReservasiRepository interface {
    InsertReservasi(reservasi entity.Reservasi) entity.Reservasi
    UpdateReservasi(reservasi entity.Reservasi) entity.Reservasi
    All() []entity.Reservasi
    FindByID(reservasiID uint64) entity.Reservasi
    DeleteReservasi(reservasi entity.Reservasi)
}

type reservasiConnection struct {
    connection *gorm.DB
}

func NewReservasiRepository(db *gorm.DB) ReservasiRepository {
    return &reservasiConnection{
        connection: db,
    }
}

func (db *reservasiConnection) InsertReservasi(reservasi entity.Reservasi) entity.Reservasi {
    db.connection.Save(&reservasi)
    return reservasi
}

func (db *reservasiConnection) UpdateReservasi(reservasi entity.Reservasi) entity.Reservasi {
    db.connection.Save(&reservasi)
    return reservasi
}

func (db *reservasiConnection) All() []entity.Reservasi {
    var reservasis []entity.Reservasi
    db.connection.Find(&reservasis)
    return reservasis
}

func (db *reservasiConnection) FindByID(reservasiID uint64) entity.Reservasi {
    var reservasi entity.Reservasi
    db.connection.Find(&reservasi, reservasiID)
    return reservasi
}

func (db *reservasiConnection) DeleteReservasi(reservasi entity.Reservasi) {
    db.connection.Delete(&reservasi)
}