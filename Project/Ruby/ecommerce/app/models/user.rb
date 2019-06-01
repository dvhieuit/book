class User < ApplicationRecord
  has_many :products, dependent: :destroy
  has_many :campaigns, dependent: :destroy
  devise :database_authenticatable, :registerable, :recoverable, :rememberable,
    :validatable, :confirmable

  enum role: {shop: 0, admin: 1}

  validates :first_name, presence: true, length: {maximum: 50, minimum: 2}
  validates :last_name, presence: true, length: {maximum: 50, minimum: 2}
end
