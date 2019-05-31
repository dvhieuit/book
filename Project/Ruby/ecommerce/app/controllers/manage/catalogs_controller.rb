class Manage::CatalogsController < ApplicationController
  def create
    @catalog = Catalog.new(catalog_params)
    respond_to do |format|
      if @catalog.save
        format.js
      else
        format.json { render json: @catalog.errors, status: :unprocessable_entity }
      end
    end
  end

  def index
    @catalog = Catalog.new
    @catalogs = Catalog.order_by_create.paginate(page: params[:page], per_page: 25)
  end

  private

  def catalog_params
    params.require(:catalog).permit(:name)
  end
end
