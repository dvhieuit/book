def stock_picker(arr)
  bestDate = [0,0]
  highNum = arr[1] - arr[0]
  for i in (0...arr.size) do
    for j in (i...arr.size) do
      if (arr[j] - arr[i]) > highNum
        highNum = arr[j] - arr[i]
        bestDate[0] = i
        bestDate[1] = j
      end
    end
  end
  bestDate
end

arr = [17,3,7,9,15,8,6,5,1]
p stock_picker(arr)
