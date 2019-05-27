def substrings(word, dictionary)
  wordCount = {}
  dictionary.each do |d|
    word.downcase.split().each do |w|
      if w.include?(d)
        wordCount[d] = 0 if wordCount[d] == nil
        wordCount[d] += 1
      end
    end
  end
  wordCount
end

dictionary = ['below','down','go','going','horn','how','howdy','it','i','low','own','part','partner','sit']
p substrings('below', dictionary)
