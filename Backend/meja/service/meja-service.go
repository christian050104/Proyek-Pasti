package service

import (
    "log"

    "github.com/christian050104/service_meja/dto"
    "github.com/christian050104/service_meja/entity"
    "github.com/christian050104/service_meja/repository"
    "github.com/mashingan/smapping"
)

type MejaService interface {
    Insert(b dto.MejaCreateDTO) entity.Meja
    Update(b dto.MejaUpdateDTO) entity.Meja
    Delete(b entity.Meja)
    All() []entity.Meja
    FindByID(mejaID uint64) entity.Meja
}

type mejaService struct {
    mejaRepository repository.MejaRepository
}

func NewMejaService(mejaRepository repository.MejaRepository) MejaService {
    return &mejaService{
        mejaRepository: mejaRepository,
    }
}

func (service *mejaService) All() []entity.Meja {
    return service.mejaRepository.All()
}

func (service *mejaService) FindByID(mejaID uint64) entity.Meja {
    return service.mejaRepository.FindByID(mejaID)
}

func (service *mejaService) Insert(b dto.MejaCreateDTO) entity.Meja {
    meja := entity.Meja{}
    err := smapping.FillStruct(&meja, smapping.MapFields(&b))
    if err != nil {
        log.Fatalf("Failed map %v", err)
    }

    res := service.mejaRepository.InsertMeja(meja)
    return res
}

func (service *mejaService) Update(b dto.MejaUpdateDTO) entity.Meja {
    meja := entity.Meja{}
    err := smapping.FillStruct(&meja, smapping.MapFields(&b))
    if err != nil {
        log.Fatalf("Failed map %v", err)
    }

    res := service.mejaRepository.UpdateMeja(meja)
    return res
}

func (service *mejaService) Delete(b entity.Meja) {
    service.mejaRepository.DeleteMeja(b)
}
