def array_of_fixnums? arr
  arr.select { |x| x.is_a?(Fixnum) } === arr
end

arr = [1,2,3]
puts array_of_fixnums?(arr)
