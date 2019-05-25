class CreateCampaigns < ActiveRecord::Migration[5.2]
  def change
    create_table :campaigns do |t|
      t.string :name
      t.integer :status, default: 0
      t.datetime :start_day
      t.datetime :end_day
      t.integer :budget
      t.integer :bid_amount
      t.text :description
      t.string :link
      t.string :banner
      t.integer :type, default: 0
      t.references :user, foreign_key: true
      t.references :product, foreign_key: true

      t.timestamps
    end
  end
end
