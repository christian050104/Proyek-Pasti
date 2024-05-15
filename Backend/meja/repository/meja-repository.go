package repository

import (
    "github.com/christian050104/service_meja/entity"
    "gorm.io/gorm"
)

type MejaRepository interface {
    InsertMeja(meja entity.Meja) entity.Meja
    UpdateMeja(meja entity.Meja) entity.Meja
    All() []entity.Meja
    FindByID(mejaID uint64) entity.Meja
    DeleteMeja(meja entity.Meja)
}

type mejaConnection struct {
    connection *gorm.DB
}

func NewMejaRepository(db *gorm.DB) MejaRepository {
    return &mejaConnection{
        connection: db,
    }
}

func (db *mejaConnection) InsertMeja(meja entity.Meja) entity.Meja {
    db.connection.Save(&meja)
    return meja
}

func (db *mejaConnection) UpdateMeja(meja entity.Meja) entity.Meja {
    db.connection.Save(&meja)
    return meja
}

func (db *mejaConnection) All() []entity.Meja {
    var mejas []entity.Meja
    db.connection.Find(&mejas)
    return mejas
}

func (db *mejaConnection) FindByID(mejaID uint64) entity.Meja {
    var meja entity.Meja
    db.connection.Find(&meja, mejaID)
    return meja
}

func (db *mejaConnection) DeleteMeja(meja entity.Meja) {
    db.connection.Delete(&meja)
}
