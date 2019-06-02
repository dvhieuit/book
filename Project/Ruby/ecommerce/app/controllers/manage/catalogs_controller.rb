class Manage::CatalogsController < ApplicationController
  before_action :authenticate_user!
  before_action :load_catalogs, except: %i(create new index)

  def create
    @catalog = Catalog.new(catalog_params)
    @catalog.save
  end

  def index
    @catalog = Catalog.new
    @catalogs = Catalog.order_by_create.paginate(page: params[:page], per_page: 25)
  end

  def edit
  end

  def update
    @catalog.update_attributes(catalog_params)
  end

  def delete
  end

  def destroy
    @catalog.destroy
  end

  private

  def catalog_params
    params.require(:catalog).permit(:name)
  end

  def load_catalogs
    @catalog = Catalog.find_by(id: params[:id])
    return if @catalog
    flash[:danger] = "Catalog not found"
    redirect_to manage_catalogs_path
  end
end
