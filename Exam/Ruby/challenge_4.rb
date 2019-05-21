def find_frequency(sentence, word)
  sentence.split(' ').map { |x| x.downcase }.count(word.downcase)
end

sentence = 'Ruby is The best language in the World'
word = 'the'
puts find_frequency(sentence, word)
