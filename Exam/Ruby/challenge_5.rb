def numberShuffle(num)
  arr = []
  num.to_s.split('').permutation.uniq.sort.each do |x|
    arr << x.join.to_i
  end
  arr
end

num = 123
p numberShuffle(num)
