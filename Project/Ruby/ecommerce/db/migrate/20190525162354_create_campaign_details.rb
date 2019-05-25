class CreateCampaignDetails < ActiveRecord::Migration[5.2]
  def change
    create_table :campaign_details do |t|
      t.integer :views
      t.integer :clicks
      t.references :campaign, foreign_key: true

      t.timestamps
    end
  end
end
