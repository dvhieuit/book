class Product < ApplicationRecord
  belongs_to :user
  belongs_to :catalog
  has_many :campaigns, dependent: :destroy

  scope :order_by_create, ->{order created_at: :desc}

  validates :name, presence: true, length: { maximum: 500, minimum: 5 }
  validates :price, presence: true, length: { minimum: 4 }
  validates :quantity, presence: true, length: { minimum: 1 }
  validates :description, presence: true, length: { minimum: 5 }
  validates :image, presence: true
  validate :image_size

  mount_uploader :image, ImageUploader

  private

  # Validates the size of an uploaded picture.
  def image_size
    return unless image.size > 5.megabytes
    errors.add(:image, "Size maximum!")
  end
end
