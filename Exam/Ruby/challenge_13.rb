def barathuma_convert(centimeters)
  aya, turak = 0, 0
  while centimeters >= 12*3
    aya += 1
    centimeters -= 12*3
  end
  while centimeters >= 2
    turak += 1
    centimeters -= 3
  end
  puts "#{aya}aya #{turak}turak"
end

barathuma_convert(24)
