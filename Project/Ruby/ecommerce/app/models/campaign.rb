class Campaign < ApplicationRecord
  belongs_to :user
  belongs_to :product
  has_many :campaign_details, dependent: :destroy
end
