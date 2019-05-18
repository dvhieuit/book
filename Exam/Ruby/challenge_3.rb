def length_finder(string_arr)
  string_arr.map { |x| x.length }
end

string_arr = ['Ruby','Rails','C42']
print length_finder(string_arr)
