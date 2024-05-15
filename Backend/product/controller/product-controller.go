package controller

import (
	"net/http"
	"strconv"

	"github.com/gin-gonic/gin"
	"github.com/christian050104/service_product/dto"
	"github.com/christian050104/service_product/entity"
	"github.com/christian050104/service_product/helper"
	"github.com/christian050104/service_product/service"
)

// ProductController is a contract about something that this controller can do
type ProductController interface {
	All(ctx *gin.Context)
	FindByID(ctx *gin.Context)
	Insert(ctx *gin.Context)
	Update(ctx *gin.Context)
	Delete(ctx *gin.Context)
	RelatedProducts(ctx *gin.Context)	
}

type productController struct {
	ProductService service.ProductService
}

// NewProductController creates a new instance of AuthController
func NewProductController(ProductService service.ProductService) ProductController {
	return &productController{
		ProductService: ProductService,
	}
}

func (c *productController) All(ctx *gin.Context) {
    products := c.ProductService.All()
    ctx.JSON(http.StatusOK, products)
}


func (c *productController) FindByID(ctx *gin.Context) {
    idStr := ctx.Param("id")
    id, err := strconv.ParseUint(idStr, 10, 64)
    if err != nil {
        res := helper.BuildErrorResponse("Failed to get ID", "No param ID were found", helper.EmptyObj{})
        ctx.JSON(http.StatusBadRequest, res)
        return
    }

    product := c.ProductService.FindByID(id)
    if product.ID == 0 {
        res := helper.BuildErrorResponse("Data not found", "No data with given ID", helper.EmptyObj{})
        ctx.JSON(http.StatusNotFound, res)
        return
    }

    
    ctx.JSON(http.StatusOK, product)
}



func (c *productController) Insert(ctx *gin.Context) {
	var productCreateDTO dto.ProductCreateDTO
	errDTO := ctx.ShouldBind(&productCreateDTO)
	if errDTO != nil {
		res := helper.BuildErrorResponse("Failed to process request", errDTO.Error(), helper.EmptyObj{})
		ctx.JSON(http.StatusBadRequest, res)
		return
	}
	result := c.ProductService.Insert(productCreateDTO)
	response := helper.BuildResponse(true, "OK!", result)
	ctx.JSON(http.StatusCreated, response)
}

	func (c *productController) Update(ctx *gin.Context) {
		var productUpdateDTO dto.ProductUpdateDTO
		errDTO := ctx.ShouldBind(&productUpdateDTO)
		if errDTO != nil {
			res := helper.BuildErrorResponse("Failed to process request", errDTO.Error(), helper.EmptyObj{})
			ctx.JSON(http.StatusBadRequest, res)
			return
		}
		idStr := ctx.Param("id")
		id, errID := strconv.ParseUint(idStr, 10, 64)
		if errID != nil {
			res := helper.BuildErrorResponse("Failed to get ID", "No param ID were found", helper.EmptyObj{})
			ctx.JSON(http.StatusBadRequest, res)
			return
		}
		productUpdateDTO.ID =uint(id) 
		result := c.ProductService.Update(productUpdateDTO)
		response := helper.BuildResponse(true, "OK!", result)
		ctx.JSON(http.StatusOK, response)
	}
func (c *productController) Delete(ctx *gin.Context) {
    var product entity.Product
    idStr := ctx.Param("id")
    id, err := strconv.ParseUint(idStr, 10, 64)
    if err != nil {
        res := helper.BuildErrorResponse("Failed to get ID", "No param ID were found", helper.EmptyObj{})
        ctx.JSON(http.StatusBadRequest, res)
        return
    }
    product.ID = uint(id)
    c.ProductService.Delete(product)
    res := helper.BuildResponse(true, "Deleted", helper.EmptyObj{})
    ctx.JSON(http.StatusOK, res)
}
func (c *productController) RelatedProducts(ctx *gin.Context) {
    idStr := ctx.Param("id")
    id, err := strconv.ParseUint(idStr, 10, 64)
    if err != nil {
        res := helper.BuildErrorResponse("Failed to get ID", "No param ID were found", helper.EmptyObj{})
        ctx.JSON(http.StatusBadRequest, res)
        return
    }

    // Assuming ProductService has a method to get related products by category ID
    relatedProducts := c.ProductService.GetRelatedProductsByCategoryID(id)
    if len(relatedProducts) == 0 {
        res := helper.BuildErrorResponse("Data not found", "No related products found for the given category ID", helper.EmptyObj{})
        ctx.JSON(http.StatusNotFound, res)
        return
    }

    ctx.JSON(http.StatusOK, relatedProducts)
}
