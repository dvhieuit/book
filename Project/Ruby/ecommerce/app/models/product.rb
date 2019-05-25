class Product < ApplicationRecord
  belongs_to :user
  belongs_to :catalog
  has_many :campaigns, dependent: :destroy
end
