Rails.application.routes.draw do
  root "static_pages#home"
  devise_for :users, controllers:{
    registrations: "users/registrations",
    sessions: "users/sessions",
    confirmations: "users/confirmations"
  }
  namespace :manage do
    resources :products
    resources :catalogs
  end
end
