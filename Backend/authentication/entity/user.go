package entity

type User struct {
	ID       uint64 `gorm:"primary_key:auto_increament" json:"id"`
	Name     string `gorm:"type:varchar(255)" json:"name"`
	Email    string `gorm:"uniqueIndex;type:varchar(255)" json:"email"`
	Password string `gorm:"->;<-;not null" json:"-"`
	Role     string `gorm:"type:ENUM('admin', 'customer');default:'customer'" json:"role"`
	Token    string `gorm:"-" json:"token,omitempty"`
}
