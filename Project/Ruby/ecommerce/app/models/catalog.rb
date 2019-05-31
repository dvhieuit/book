class Catalog < ApplicationRecord
  has_many :products, dependent: :destroy

  scope :sort_by_name_at_asc, ->{order name: :asc}
  scope :order_by_create, ->{order created_at: :desc}

  validates :name, presence: true
end
