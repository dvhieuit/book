Rails.application.routes.draw do
  root "static_pages#home"
  devise_for :users, controllers:{
    registrations: "users/registrations"
  }
  namespace :manage do
    resources :products
  end
end
