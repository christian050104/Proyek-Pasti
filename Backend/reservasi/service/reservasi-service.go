// service/reservasi_service.go
package service

import (
	"log"

	"github.com/christian050104/service_reservasi/dto"
	"github.com/christian050104/service_reservasi/entity"
	"github.com/christian050104/service_reservasi/repository"
	"github.com/mashingan/smapping"
)

type ReservasiService interface {
	Insert(b dto.ReservasiCreateDTO) entity.Reservasi
	Update(b dto.ReservasiUpdateDTO) entity.Reservasi
	Delete(b entity.Reservasi)
	All() []entity.Reservasi
	FindByID(reservasiID uint64) entity.Reservasi
}

type reservasiService struct {
	reservasiRepository repository.ReservasiRepository
}

func NewReservasiService(reservasiRepository repository.ReservasiRepository) ReservasiService {
	return &reservasiService{
		reservasiRepository: reservasiRepository,
	}
}

func (service *reservasiService) All() []entity.Reservasi {
	return service.reservasiRepository.All()
}

func (service *reservasiService) FindByID(reservasiID uint64) entity.Reservasi {
	return service.reservasiRepository.FindByID(reservasiID)
}

func (service *reservasiService) Insert(b dto.ReservasiCreateDTO) entity.Reservasi {
	reservasi := entity.Reservasi{}
	err := smapping.FillStruct(&reservasi, smapping.MapFields(&b))
	if err != nil {
		log.Fatalf("Failed map %v", err)
	}

	res := service.reservasiRepository.InsertReservasi(reservasi)
	return res
}

func (service *reservasiService) Update(b dto.ReservasiUpdateDTO) entity.Reservasi {
	reservasi := entity.Reservasi{}
	err := smapping.FillStruct(&reservasi, smapping.MapFields(&b))
	if err != nil {
		log.Fatalf("Failed map %v", err)
	}

	res := service.reservasiRepository.UpdateReservasi(reservasi)
	return res
}

func (service *reservasiService) Delete(b entity.Reservasi) {
	service.reservasiRepository.DeleteReservasi(b)
}
