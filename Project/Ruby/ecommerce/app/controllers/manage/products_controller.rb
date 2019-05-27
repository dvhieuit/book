class Manage::ProductsController < ApplicationController
  before_action :load_catalogs

  def new
    @product = Product.new
    respond_to do |format|
      format.js
    end
  end

  def create
    @product = current_user.products.build(product_params)
    if @product.save
      flash[:success] = "Add product success!"
    else
      flash[:dange] = "Add product fail!"
    end
    redirect_to root_path
  end

  private

  def product_params
    params.require(:product).permit(:name, :catalog_id, :image)
  end

  def load_catalogs
    @catalogs = Catalog.sort_by_name_at_asc.map{|c| [c.name, c.id]}
  end
end
