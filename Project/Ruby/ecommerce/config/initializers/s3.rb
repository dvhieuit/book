if Rails.env.production?
  CarrierWave.configure do |config|
    config.fog_credentials = {
        :provider               => 'AWS',
        :aws_access_key_id      => "AKIAIZNPKZFOL5WE4HFQ",
        :aws_secret_access_key  => "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",
        :region                 => 'us-east-2'
    }
    config.fog_directory  = "thegioididongexample"
    config.fog_provider = 'fog/aws'
  end
end
