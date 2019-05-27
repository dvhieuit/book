def LongestWord(sen)
  arr = sen.split(' ').each { |x| x.gsub!(/[^a-zA-Z0-9]/, '') }
  max = arr[0]
  arr.each { |x| max = x if max.length < x.length }
  max
end

sen = 'fun&!! time'
puts LongestWord(sen)
