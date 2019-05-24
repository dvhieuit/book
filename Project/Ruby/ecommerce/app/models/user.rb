class User < ApplicationRecord
  devise :database_authenticatable, :registerable, :recoverable, :rememberable,
    :validatable, :confirmable

  enum role: {shop: 0, admin: 1}

  validates :full_name, presence: true, length: {maximum: 50, minimum: 6}
  validates :phone_number, presence: true, length: {maximum: 11, minimum: 9}
end
