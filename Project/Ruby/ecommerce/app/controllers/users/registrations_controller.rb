# frozen_string_literal: true

class Users::RegistrationsController < Devise::RegistrationsController
  before_action :configure_permitted_parameters, only: %i(create update)

  # GET /resource/sign_up
  # def new
  #   super
  # end

  protected

  def configure_permitted_parameters
    added_attrs = [:full_name, :phone_number]
    devise_parameter_sanitizer.permit :sign_up, keys: added_attrs
    devise_parameter_sanitizer.permit :account_update, keys: added_attrs
  end
end
