def kaprekar? num
  square = num ** 2
  left = square.to_s[0..(square.to_s.length - num.to_s.length - 1)]
  right = square.to_s[left.length..(square.to_s.length - 1)]
  num == left.to_i + right.to_i
end

num = 703
puts kaprekar?(num)
