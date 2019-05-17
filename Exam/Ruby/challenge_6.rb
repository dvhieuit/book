def palindrome? sentence
  sentence.downcase!.gsub!(" ", "") == sentence.reverse
end

sentence = "Never odd or even"
puts palindrome?(sentence)
